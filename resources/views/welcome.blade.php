<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
               /*text-align: center;*/
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="flex-center position-ref full-height">

        <div id="app_vue" >
            <div class="content">
                <p class="text-center alert alert-danger" v-bind:class="{hidden:hasError}">
                    Please fill all the fields
                </p>
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required class="form-control" placeholder="Enter your name" v-model="newItem.name">
            </div>
            <div class="form-group">
                <label for="age">Age: </label>
                <input type="number" name="age" id="age" required class="form-control" placeholder="Enter your age" v-model="newItem.age">
            </div>
            <div class="form-group">
                <label for="profession">Profession: </label>
                <input type="text" name="profession" id="profession" required class="form-control" placeholder="Enter your profession" v-model="newItem.profession">
            </div>
            <button class="btn btn-primary" @click.prevent="createItem()">
                <span class="glyphicon glyphicon-plus" ></span> ADD
            </button>
                <div class="table table-borderless" id="table">
                <table class="table table-borderless" id="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Profession</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tr v-for="item in items">
                        <td>@{{ item.id }}</td>
                        <td>@{{ item.name }}</td>
                        <td>@{{ item.age }}</td>
                        <td>@{{ item.profession }}</td>
                        <td id="show-modal" @click="showModal=true; setVal(item.id, item.name,item.age,item.profession)" class="btn btn-info">
                        <span class="glyphicon glyphicon-pencil"></span>
                        </td>
                        <td @click.prevent="deleteItem(item)" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                        </td>
                    </tr>
                </table>
                </div>
                <modal v-if="showModal" @close="showModal=false">
                    <h3 slot="header">Edit Item</h3>
                    <div slot="body">
                        <input type="hidden" disabled name="e_id" id="e_id"
                                class="form-control" :value="this.e_id">
                        Name: <input type="text" name="e_name" id="e_name" required class="form-control"
                               :value="this.e_name">
                        Age: <input type="number" name="e_age" id="e_age" required class="form-control"
                                      :value="this.e_age">
                        Profession: <input type="text" name="e_profession" id="e_profession" required class="form-control"
                                     :value="this.e_profession">
                    </div>
                    <div slot="footer">
                        <button class="btn btn-default" @click="showModal = false">
                            Cancel
                        </button>
                        <button class="btn btn-info" @click="editItem()">
                            Update
                        </button>
                    </div>
                </modal>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header">
                            <slot name="header">
                                default header
                            </slot>
                        </div>

                        <div class="modal-body">
                            <slot name="body">

                            </slot>
                        </div>

                        <div class="modal-footer">
                            <slot name="footer">


                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </script>
    </body>
</html>
