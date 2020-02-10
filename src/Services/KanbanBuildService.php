<?PHP

namespace ConfrariaWeb\Jkanban\Services;

class KanbanBuildService
{

    public $boards;

    public function __construct()
    {

    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public function mount()
    {
        $this->data['id'] = 'jKanbanLaravel';
        return view('cwjkanban::kanban', $this->data);
    }

}
