import { usePage, Head, Link } from "@inertiajs/react";
import React from "react";

export default function App({ title, children }){
    const { users, auth } = usePage().props;
    return (
        <div className="flex min-h-screen">
            <Head title={title} />
            <div className="w-1/3">
                <div className="w-1/3 fixed h-full flex flex-col px-6 py-4 text-right border-r space-y-2">
                   <div className="flex-1 overflow-y-auto ">
                        {
                            users.map(user => (
                              <Link 
                              key={user.id} 
                              href={route('chats.show', user.username)}
                              className={`block ${route().current('chats.show', user.username) ? 'text-black font-semibold' : ''}`}>
                                {user.name}
                            </Link>
                            ))
                        }
                   </div>
                   <div className="bg-slate-100 rounded-xl p-4 space-y-3">
                    <div>
                        { auth.user.name }
                    </div>
                    <Link href={route('logout')} method="POST" as="button" className="border bg-white font-medium text-black rounded-xl px-4 py-2">Log Out</Link>
                   </div>
                </div>
            </div>
            <div className="w-2/3">
                {children}
            </div>
        </div>
    )
}