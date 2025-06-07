import React from "react";
import { Head, useForm } from "@inertiajs/react";
import App from "@/Layouts/App";

export default function Show(props){
    const { user } = props
    const {data, setData, reset, errors, post } = useForm({ message: '' })
    const submitHandler = (event) => {
      event.preventDefault();
      post(route('chats.store', user.username), {
        onSuccess: () => {
          reset('message');
        }
      })
    }

    return (
      <div>
        <Head title={`Chat with ${user.name}`}/>
        <div className="flex flex-col justify-between h-screen">
           <div className="border-b p-4">
            <h1 className="font-semibold">
                {user.name}
            </h1>
           </div>
           <div className="flex-1 overflow-y-auto px-4 py-2">
              <div className="text-gray-500">
                 Start chating . . .
              </div>
           </div>
           <div className="border-t">
               <form onSubmit={submitHandler}>
                  <input 
                    value={data.message} 
                    onChange={ (event) => setData({...data, message: event.target.value}) } 
                    type="text" 
                    placeholder="Start typing . . ." 
                    name="message" 
                    id="message" 
                    className="form-text focus:outline-none focus:border-0 focus:ring-0 border-0 w-full"/>
               </form>
           </div>
        </div> 
      </div> 
    )
}

Show.layout = (page) => <App children={page} title="Chatty App"/>