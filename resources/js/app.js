require('./bootstrap.js');

$('.edit-goals').change(function () {
    let $input = $(this);
    const goals = $(this).val();
    const dataGoals = $(this).attr('data-value');
    const matchId = $(this).attr('data-match-id');
    const teamId = $(this).attr('data-team-id');

    $.ajax({
        method: 'POST',
        data: {
            _method: 'PUT',
            goals: goals
        },
        url: `/matches/${matchId}/teams/${teamId}`,
        success: function () {
            $input.attr('data-val', goals);
        },
        error: function (data) {
            $input.val(dataGoals);
            alert('Error');
            console.error(data)
        }
    });
});
