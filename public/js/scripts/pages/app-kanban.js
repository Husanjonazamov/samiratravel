$(function () {
    'use strict';

    var boards,
        openSidebar = true,
        kanbanWrapper = $('.kanban-wrapper'),
        sidebar = $('.update-item-sidebar'),
        datePicker = $('#due-date'),
        select2 = $('.select2'),
        label_input = $('#label'),
        abiturient_input = $('#abiturient'),
        user_input = $('#user'),
        commentEditor = $('.comment-editor'),
        addNewForm = $('.add-new-board'),
        updateItemSidebar = $('.update-item-sidebar'),
        addNewInput = $('.add-new-board-input');

    var assetPath = '../../../app-assets/';
    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
    }

    // Get Data
    $.ajax({
        type: 'GET',
        dataType: 'json',
        async: false,
        url: $('#api').val() ?? assetPath + 'data/kanban.json',
        success: function (data) {
            boards = data;
        }
    });

    // Toggle add new input and actions
    addNewInput.toggle();

    // datepicker init
    if (datePicker.length) {
        datePicker.flatpickr({
            monthSelectorType: 'static',
            altInput: true,
            altFormat: 'j F, Y',
            dateFormat: 'Y-m-d'
        });
    }

    // select2
    if (select2.length) {
        function renderLabels(option) {
            if (!option.id) {
                return option.text;
            }
            var $badge = "<div class='badge " + $(option.element).data('color') + " badge-pill'> " + option.text + '</div>';

            return $badge;
        }


    }

    // Comment editor
    if (commentEditor.length) {
        new Quill('.comment-editor', {
            modules: {
                toolbar: '.comment-toolbar'
            },
            placeholder: 'Write a Comment... ',
            theme: 'snow'
        });
    }

    // Render board dropdown
    function renderBoardDropdown() {
        return (
            "<div class='dropdown'>" +
            feather.icons['more-vertical'].toSvg({
                class: 'dropdown-toggle cursor-pointer font-medium-3 mr-0',
                id: 'board-dropdown',
                'data-toggle': 'dropdown',
                'aria-haspopup': 'true',
                'aria-expanded': 'false'
            }) +
            "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='board-dropdown'>" +
            "<a class='dropdown-item delete-board' href='javascript:void(0)'> " +
            feather.icons['trash'].toSvg({class: 'font-medium-1 align-middle'}) +
            "<span class='align-middle ml-25'>Delete</span></a>" +
            "<a class='dropdown-item' href='javascript:void(0)'>" +
            feather.icons['edit'].toSvg({class: 'font-medium-1 align-middle'}) +
            "<span class='align-middle ml-25'>Rename</span></a>" +
            "<a class='dropdown-item' href='javascript:void(0)'>" +
            feather.icons['archive'].toSvg({class: 'font-medium-1 align-middle'}) +
            "<span class='align-middle ml-25'>Archive</span></a>" +
            '</div>' +
            '</div>'
        );
    }

    // Render item dropdown
    function renderDropdown() {
        return (
            "<div class='dropdown item-dropdown px-1'>" +
            feather.icons['more-vertical'].toSvg({
                class: 'dropdown-toggle cursor-pointer mr-0 font-medium-1',
                id: 'item-dropdown',
                ' data-toggle': 'dropdown',
                'aria-haspopup': 'true',
                'aria-expanded': 'false'
            }) +
            "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='item-dropdown'>" +
            "<a class='dropdown-item' href='javascript:void(0)'>Copy task link</a>" +
            "<a class='dropdown-item' href='javascript:void(0)'>Duplicate task</a>" +
            "<a class='dropdown-item delete-task' href='javascript:void(0)'>Delete</a>" +
            '</div>' +
            '</div>'
        );
    }

    // Render header
    function renderHeader(color, text) {
        return (
            "<div class='d-flex justify-content-between flex-wrap align-items-center mb-1'>" +
            "<div class='item-badges'> " +
            "<div class='badge badge-pill " +
            color +
            "'> " +
            text +
            '</div>' +
            '</div>' +
            renderDropdown() +
            '</div>'
        );
    }

    // Render avatar
    function renderAvatar(images, pullUp, margin, members, size) {
        var $transition = pullUp ? ' pull-up' : '',
            member = members !== undefined ? members.split(',') : '';

        return images !== undefined
            ? images
                .split(',')
                .map(function (img, index, arr) {
                    var $margin = margin !== undefined && index !== arr.length - 1 ? ' mr-' + margin + '' : '';

                    return (
                        "<li class='avatar kanban-item-avatar" +
                        ' ' +
                        $transition +
                        ' ' +
                        $margin +
                        "'" +
                        "data-toggle='tooltip' data-placement='top'" +
                        "title='" +
                        member[index] +
                        "'" +
                        '>' +
                        "<img src='" +
                        img +
                        "' alt='Avatar' height='" +
                        size +
                        "'>" +
                        '</li>'
                    );
                })
                .join(' ')
            : '';
    }

    // Render footer
    function renderFooter(attachments, comments, assigned, members) {
        return (
            "<div class='d-flex justify-content-between align-items-center flex-wrap mt-1'>" +
            "<div> <span class='align-middle mr-50'>" +
            feather.icons['paperclip'].toSvg({class: 'font-medium-1 align-middle mr-25'}) +
            "<span class='attachments align-middle'>" +
            attachments +
            '</span>' +
            "</span> <span class='align-middle'>" +
            feather.icons['message-square'].toSvg({class: 'font-medium-1 align-middle mr-25'}) +
            '<span>' +
            comments +
            '</span>' +
            '</span></div>' +
            "<ul class='avatar-group mb-0'>" +
            renderAvatar(assigned, true, 0, members, 28) +
            '</ul>' +
            '</div>'
        );
    }

    // Init kanban
    var kanban = new jKanban({
        element: '.kanban-wrapper',
        gutter: '15px',
        widthBoard: '250px',
        dragItems: true,
        boards: boards,
        dragBoards: true,
        addItemButton: true,
        itemAddOptions: {
            enabled: true, // add a button to board for easy item creation
            content: '+ Add New Item', // text or html content of the board button
            class: 'kanban-title-button btn btn-default btn-xs', // default class of the button
            footer: false // position the button on footer
        },
        click: function (el) {
            var el = $(el);
            var title = el.attr('data-eid') ? el.find('.kanban-text').text() : el.text(),
                date = el.attr('data-due-date'),
                dateObj = new Date(),
                year = dateObj.getFullYear(),
                dateToUse = date,
                label = el.attr('data-label'),
                abiturientdata = el.attr('data-abiturient');


            if (el.find('.kanban-item-avatar').length) {
                el.find('.kanban-item-avatar').on('click', function (e) {
                    e.stopPropagation();
                });
            }
            if (!$('.dropdown').hasClass('show') && openSidebar) {
                sidebar.modal('show');
            }
            sidebar.find('.update-item-form').on('submit', function (e) {
                e.preventDefault();

                $('#update').val(function (i, v) { //index, current value
                    return v.replace("#", el.attr('data-eid'));
                });
                var data = new FormData();

                //Form data
                var form_data = $('#update-form').serializeArray();
                $.each(form_data, function (key, input) {
                    data.append(input.name, input.value);
                });

                //File data
                if ($('input[name="file"]')[0].files.length > 0) {
                    data.append('file', $('input[name="file"]')[0].files[0]);
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: $('#update').val(),
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function (data) {
                        window.location.reload();
                    }
                });
            });
            sidebar.find('#title').val(title);
            sidebar.find(datePicker).next('.form-control').val(dateToUse);
            sidebar.find(label_input).val(label).trigger('change');
            sidebar.find(abiturient_input).val(abiturientdata).trigger('change');
            sidebar.find(user_input).val(abiturientdata).trigger('change');
            sidebar.find($('#comment')).val(el.attr('data-comment'));
            $('#tab-activity').html('');

            var commentlist = JSON.parse(el.attr('data-comments-list'))
            for (var i = 0; i < commentlist.length; i++) {
                if (commentlist[i].file)
                    commentlist[i].file = commentlist[i].file.replace('public', '/storage');
                else
                    commentlist[i].file = '';
                commentlist[i].created_at = new Date(commentlist[i].created_at).toLocaleString('ru');
                if (!commentlist[i].comment)
                    commentlist[i].comment = '';
                if (commentlist[i].file)
                    commentlist[i].comment = '<a href="' + commentlist[i].file + '" target="_blank">' + commentlist[i].comment + '</a>';
                $('#tab-activity').append(' <div class="media mb-1">\n' +
                    '<div class="avatar bg-light-success my-0 ml-0 mr-50">\n' +
                    '<span class="avatar-content">' +
                    el.attr('data-user-avatar-name')
                    + '</span>\n' +
                    '</div>\n' +
                    '<div class="media-body">\n' +
                    '<p class="mb-0"><span class="font-weight-bold">' +
                    el.attr('data-user-name') +
                    '</span> ' +
                    commentlist[i].comment +
                    '</p>\n' +
                    '<small class="text-muted">' +
                    commentlist[i].created_at +
                    '</small>\n' +
                    '</div>\n' +
                    '</div>');

            }
        },

        buttonClick: function (el, boardId) {
            var addNew = document.createElement('form');
            addNew.setAttribute('class', 'new-item-form');
            $('#store').val(function (i, v) { //index, current value
                return v.replace("#", boardId);
            })
            addNew.setAttribute('action', $('#store').val());
            addNew.setAttribute('method', 'POST');
            addNew.innerHTML =
                '<input type="hidden" name="_method" value="PUT">' +
                '<input type="hidden" name="_token" value="' + $('meta[name="csrf-token"]').attr('content') + '">' +
                '<div class="form-group mb-1">' +
                '<input type="text" name="title" id="title" class="form-control" placeholder="Enter Title"/>' +
                '</div>' +
                '<div class="form-group mb-2">' +
                '<button type="submit" class="btn btn-primary btn-sm mr-1">Add</button>' +
                '<button type="button" class="btn btn-outline-secondary btn-sm cancel-add-item">Cancel</button>' +
                '</div>';
            kanban.addForm(boardId, addNew);
            addNew.querySelector('input').focus();
            addNew.addEventListener('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        var currentBoard = $(".kanban-board[data-id='" + boardId + "']");
                        kanban.addElement(boardId, {
                            title: "<span class='kanban-text'>" + e.target[2].value + '</span>',
                            id: boardId + '-' + currentBoard.find('.kanban-item').length + 1
                        });
                        currentBoard.find('.kanban-item:last-child .kanban-text').before(renderDropdown());
                        addNew.remove();
                    }
                });
            });
            $(document).on('click', '.cancel-add-item', function () {
                $(this).closest(addNew).toggle();
            });
        },
        dragEl: function (el, source) {
            $(el).find('.item-dropdown, .item-dropdown .dropdown-menu.show').removeClass('show');
        },
        dropEl: function (el, target, source, sibling) {
            var sourceId = $(source).closest("div.kanban-board").attr("data-id"),
                targetId = $(target).closest("div.kanban-board").attr("data-id");

            if (source === target) {
                // same column
            } else {
                $('#update').val(function (i, v) { //index, current value
                    return v.replace("#", $(el).closest("div.kanban-item").attr('data-eid'));
                });
                $.ajax({
                    url: $('#update').val(),
                    type: 'PUT',
                    data: {
                        _method: 'PUT',
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        kanban_id: targetId,
                        title: $(el).find(".kanban-text").text(),
                    },
                    success: function (data) {
                        window.location.reload();
                    }
                });
                console.log(el);
                console.log(targetId);
            }
        }
    });

    if (kanbanWrapper.length) {
        new PerfectScrollbar(kanbanWrapper[0]);
    }

    // Render add new inline with boards
    $('.kanban-container').append(addNewForm);

    // Change add item button to flat button
    $.each($('.kanban-title-button'), function () {
        $(this).removeClass().addClass('kanban-title-button btn btn-flat-secondary btn-sm ml-50');
        Waves.init();
        Waves.attach("[class*='btn-flat-']");
    });

    // Makes kanban title editable
    $(document).on('mouseenter', '.kanban-title-board', function () {
        $(this).attr('contenteditable', 'true');
    });

    // Appends delete icon with title
    $.each($('.kanban-board-header'), function () {
        $(this).append(renderBoardDropdown());
    });

    // Deletes Board
    $(document).on('click', '.delete-board', function () {
        var id = $(this).closest('.kanban-board').data('id');
        kanban.removeBoard(id);
    });

    // Delete task
    $(document).on('click', '.dropdown-item.delete-task', function () {
        openSidebar = true;
        var id = $(this).closest('.kanban-item').data('eid');
        kanban.removeElement(id);
    });

    // Open/Cancel add new input
    $('.add-new-btn, .cancel-add-new').on('click', function () {
        addNewInput.toggle();
    });

    // Add new board
    addNewForm.on('submit', function (e) {
        e.preventDefault();
        var $this = $(this),
            value = $this.find('.form-control').val(),
            id = value.replace(/\s+/g, '-').toLowerCase();
        kanban.addBoards([
            {
                id: id,
                title: value
            }
        ]);
        // Adds delete board option to new board & updates data-order
        $('.kanban-board:last-child').find('.kanban-board-header').append(renderBoardDropdown());

        // Remove current append new add new form
        addNewInput.val('').css('display', 'none');
        $('.kanban-container').append(addNewForm);

        // Update class & init waves
        $.each($('.kanban-title-button'), function () {
            $(this).removeClass().addClass('kanban-title-button btn btn-flat-secondary btn-sm ml-50');
            Waves.init();
            Waves.attach("[class*='btn-flat-']");
        });
    });

    // Clear comment editor on close
    sidebar.on('hidden.bs.modal', function () {
        sidebar.find('#comment').val('');
        sidebar.find('.nav-link-activity').removeClass('active');
        sidebar.find('.tab-pane-activity').removeClass('show active');
        sidebar.find('.nav-link-update').addClass('active');
        sidebar.find('.tab-pane-update').addClass('show active');
    });

    // Re-init tooltip when modal opens(Bootstrap bug)
    sidebar.on('shown.bs.modal', function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.update-item-form').on('submit', function (e) {
        e.preventDefault();
        sidebar.modal('hide');
    });

    // Render custom items
    $.each($('.kanban-item'), function () {
        var $this = $(this),
            $text = "<span class='kanban-text'>" + $this.text() + '</span>';
        if ($this.attr('data-badge') !== undefined && $this.attr('data-badge-text') !== undefined) {
            $this.html(renderHeader($this.attr('data-badge'), $this.attr('data-badge-text')) + $text);
        }
        if (
            $this.attr('data-comments') !== undefined ||
            $this.attr('data-due-date') !== undefined ||
            $this.attr('data-assigned') !== undefined
        ) {
            $this.append(
                renderFooter(
                    $this.attr('data-attachments'),
                    $this.attr('data-comments'),
                    $this.attr('data-assigned'),
                    $this.attr('data-members')
                )
            );
        }
        if ($this.attr('data-image') !== undefined) {
            $this.html(
                renderHeader($this.attr('data-badge'), $this.attr('data-badge-text')) +
                "<img class='img-fluid rounded mb-50' src='" +
                assetPath +
                'images/slider/' +
                $this.attr('data-image') +
                "' height='32'/>" +
                $text +
                renderFooter(
                    $this.attr('data-due-date'),
                    $this.attr('data-comments'),
                    $this.attr('data-assigned'),
                    $this.attr('data-members')
                )
            );
        }
        $this.on('mouseenter', function () {
            $this.find('.item-dropdown, .item-dropdown .dropdown-menu.show').removeClass('show');
        });
    });

    if (updateItemSidebar.length) {
        updateItemSidebar.on('hidden.bs.modal', function () {
            updateItemSidebar.find('.custom-file-label').empty();
        });
    }
});
