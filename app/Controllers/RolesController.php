<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RoleModel;

class RolesController extends BaseController
{
    public function role_list()
    {
        // Get input parameters
        $input = $this->request->getGet();
        $page = max((int) ($input['page'] ?? 1), 1);
        $perpage = max((int) ($input['page_limit'] ?? 6), 1);
        $role_id = $input['role_id'] ?? null;

        $RoleModel = new RoleModel();
        // Build the query
        $RoleModel->select('roles.*')
            ->orderBy('roles.id', 'ASC');

        if (!empty($role_id)) {
            $RoleModel->where('roles.id', $role_id);
        }

        // Get total count of roles
        $total_items = $RoleModel->countAllResults(false);

        // Fetch paginated roles
        $roles = $RoleModel->paginate($perpage, 'custom_pagination', $page);
        $pager = $RoleModel->pager;

        // Add sequence number to each role
        $start_sequence_number = ($page - 1) * $perpage + 1;
        foreach ($roles as $index => &$role) {
            $role['sequence_number'] = $start_sequence_number + $index;
        }

        // Prepare data for the view
        $data = [
            'roles' => $roles,
            'pager_links' => $pager->links('custom_pagination'),
            'total_items' => $total_items,
        ];
        return view('pages/admin/role/role-list', $data);
    }
    public function add_role()
    {
        return view('pages/admin/role/role-add');
    }
    public function role_detail()
    {
        return view('pages/admin/role/role-profile');
    }
    public function edit_role($id)
    {
        $RoleModel = new RoleModel();
        $data['value'] = $RoleModel->find($id);
        return view('pages/admin/role/role-edit', $data);
    }
}
