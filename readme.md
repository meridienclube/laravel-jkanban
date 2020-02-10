# Package JKanban Laravel

Pacote de kanban para laravel

https://github.com/riktar/jkanban

## Installation
```php
composer require confrariaweb/laravel-jkanban
```
# How to use

You need to first create an url with the expected json return to feed the "boards" according 
to  documentation "Jkanban".

That done, the next step is to call the service on your controller as shown below:

```php
    $kanban = resolve('KanbanBuildService');
    $setData['route'] = route('api.users.jkanban', ['api_token' => auth()->user()->api_token]);
    $setData['dropEl'] = 'var user_id = $(el).data(\'eid\');
    var step_slug = target.parentElement.getAttribute(\'data-id\');
    $.post("' . route('users.update.step', ['api_token' => auth()->user()->api_token]) . '",
    {
        user_id: user_id,
        step_slug: step_slug
    },
    function (data, status) {
        //console.log(data);
    })';
    $setData['click'] = 'var user_id = $(el).data(\'eid\');
    window.location.replace("' . url()->to('meridien/users')  . '/" + user_id);';
    $kanban->setData($setData);
    $data['kanban'] = $kanban;
    return view('users.kanban', $data);
```
As you can see above you can also inject snippets of javascript code for kanban actions, these injections are as follows:

- click - callback when any board's item are clicked
- dragEl - callback when any board's item are dragged
- dragendEl - callback when any board's item stop drag
- dropEl - callback when any board's item drop in a board
- dragBoard - callback when any board stop drag
- dragendBoard - callback when any board stop drag
- buttonClick - callback when the board's button is clicked

#views

After that just call the method that assembles the kanban in your view as follows:

```php
/*kanban.blade.php*/
{{ $kanban->mount() }}
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
