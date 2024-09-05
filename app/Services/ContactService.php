<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactService
{

    public function listContacts($search = null, $perPage = 10)
    {
        $query = Auth::user()->contacts();
        // dd($query);
        // If a search term is provided, filter the contacts
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('company', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%");
        }

        // Return paginated result
        return $query->paginate($perPage);
    }  
  
    public function createContact(array $data)
    {
        $data['user_id'] = Auth::id();
        return Contact::create($data);
    }

    /**
     * Get a specific contact owned by the authenticated user.
     */
    public function getContactById($id)
    {
        return Auth::user()->contacts()->findOrFail($id);
    }

    /**
     * Update a contact owned by the authenticated user.
     */
    public function updateContact($id, array $data)
    {
        $contact = Auth::user()->contacts()->findOrFail($id);
        $contact->update($data);
        return $contact;
    }

    /**
     * Delete a contact owned by the authenticated user.
     */
    public function deleteContact($id)
    {
        $contact = Auth::user()->contacts()->findOrFail($id);
        return $contact->delete();
    }
}
