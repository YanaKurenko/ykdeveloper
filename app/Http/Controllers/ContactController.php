<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function sendForm(Request $request)
    {
        // Проверяем данные формы
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Отправляем письмо с помощью почтового шаблона
        Mail::to('yana.kurenko@krabutech.ee')->send(new ContactFormMail($validatedData));

        // Возвращаем ответ пользователю
        return redirect()->back()->with('success', 'Сообщение отправлено');
    }
}
