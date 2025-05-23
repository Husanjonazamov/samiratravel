<?php


namespace App\Services\Sms;


use App\Jobs\SendSmsJob;
use App\Models\SmsConfirm;
use Exception;
use Illuminate\Support\Carbon;

class SmsService
{
    public $code;
    /**
     * @param $phone
     * @return bool
     * @throws PhoneBlockedException
     * @throws Exception
     */
    public static function diffMinutesOnString($datetime1, $datetime2)
    {
        $difference = $datetime1->diff($datetime2);
        return __('sms.minutes_diff', ['minutes' => $difference->i, 'seconds' => $difference->s]);
    }

    public function sendConfirm($phone)
    {
        $smsConfirm = SmsConfirm::query()->where(['phone' => $phone])->first();
        if ($smsConfirm === null) {
            $smsConfirm = new SmsConfirm();
        }
        if ($smsConfirm->isBlockExpired()) {
            $smsConfirm->try_count = 0;
            $smsConfirm->resend_count = 0;
            $smsConfirm->unblocked_at = null;
            $smsConfirm->save();
        }

        if ($smsConfirm->isOutOfResendLimit()) {
            $smsConfirm->unblocked_at = Carbon::now()->addMinutes(SmsConfirm::BLOCKED_MINUTES);
            $smsConfirm->save();
        }

        if ($smsConfirm->isBlocked()) {
            $time = self::diffMinutesOnString($smsConfirm->unblocked_at, Carbon::now());
            throw new PhoneBlockedException(__('sms.phone_blocked', ['time' => $time]));
        }

        $code =rand(10000, 99999);
        $this->code=$code;
        $smsConfirm->fill([
            'code' => $code,
            'try_count' => 0,
            'resend_count' => $smsConfirm->resend_count + 1,
            'phone' => $phone,
            'expired_at' => Carbon::now()->addSeconds(SmsConfirm::SMS_EXPIRY_SECONDS)

        ]);
        if (empty($smsConfirm->id)) {
            $smsConfirm->save();
        } else {
            $smsConfirm->update();
        }

        SendSmsJob::dispatchAfterResponse($smsConfirm);//TODO
        return true;
    }

    /**
     * @param string $phone
     * @param string $code
     * @return bool
     * @throws InvalidConfirmationCodeException
     * @throws SmsNotFoundException
     * @throws TooManyAttemptsException
     * @throws CodeExpired
     */
    public function confirm(string $phone, string $code)
    {
        /**
         * @var SmsConfirm $smsConfirm
         */
        $smsConfirm = SmsConfirm::query()->where(['phone' => $phone])->first();
        if ($smsConfirm === null) {
            throw new SmsNotFoundException(__('sms.invalid_code'));
        }

        if ($smsConfirm->isOutOfTries()) {
            throw new TooManyAttemptsException(__('sms.too_many_attempts'));
        }

        if ($smsConfirm->SmsExpirySeconds()) {
            throw new CodeExpired(__('sms.сode_expired'));
        }

        if ($smsConfirm->code === $code) {
            $smsConfirm->delete();
            return true;
        }
        ++$smsConfirm->try_count;
        $smsConfirm->save();

        throw new InvalidConfirmationCodeException(__('sms.invalid_code'));
    }
}
