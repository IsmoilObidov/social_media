<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>

        </ul>
        <form class="w-100 my-2 mr-2 my-lg-0">
            <div class="search-bar">
                <input id="inputTxt" id="search" type="text" class="form-control" placeholder="Search ..."
                    onkeyup="filterUser()">
                <i class="bi bi-search"></i>
            </div>
            <div class="list-group">
            </div>
        </form>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a class="btn btn-primary">{{ Auth::user()->name }}</a>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->photo)
                            <img src="{{ asset(Auth::user()->photo) }}" alt="" width="35" height="35"
                                class="rounded-circle">
                        @endif

                        @if (Auth::user()->gender == 1 && !Auth::user()->photo)
                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35"
                                height="35" class="rounded-circle">
                        @endif

                        @if (Auth::user()->gender == 2 && !Auth::user()->photo)
                            <img src="{{ asset('assets/images/profile/female.avif') }}" alt="" width="35"
                                height="35" class="rounded-circle">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('profile') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">Profile</p>
                            </a>

                            <a href="{{ route('my_post') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-mail fs-6"></i>
                                <p class="mb-0 fs-3">Post</p>
                            </a>

                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-list-check fs-6"></i>
                                <p class="mb-0 fs-3">Task</p>
                            </a>

                            <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        function filterUser() {
            let inputTxt = event.target; // Get the target element
            let list_group = document.querySelector(".list-group");
            var form = new FormData();
            form.append("text", event.target.value);
            form.append("_token", '{{ csrf_token() }}');

            var settings = {
                "url": "http://social.loc/filter_user",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };
            $.ajax(settings).done(function(response) {
                let data = JSON.parse(response);
                console.log(data);
                ListItemGenerator(inputTxt, data, list_group);

            });


        }

        function ListItemGenerator(inputTxt, data, list_group) {
            if (!inputTxt.value) {
                inputTxt.parentElement.classList.remove("active");
                list_group.style.display = "none";
            } else {
                inputTxt.parentElement.classList.add("active");
                list_group.style.display = "block";

                let SearchResults = data.filter(function(choice) {
                    return choice.name.toLowerCase().startsWith(inputTxt.value.toLowerCase());
                });

                CreatingList(SearchResults);

                function CreatingList(Words) {
                    let createdList = Words.map(function(word) {
                        return "<li>" + word.name + "</li>";
                    });
                    let CustomListItem;
                    if (!CreatingList.length) {
                        CustomListItem = "<li>" + inputTxt.value + "</li>";
                    } else {
                        CustomListItem = createdList.join("");
                    }
                    list_group.innerHTML = CustomListItem;
                    CompleteText();
                }
            }

            function CompleteText() {
                all_list_items = list_group.querySelectorAll("li");
                all_list_items.forEach(function(list) {
                    list.addEventListener("click", function(e) {
                        inputTxt.value = e.target.textContent;
                        list_group.style.display = "none";
                    });
                });
            }
        }
    </script>
</header>
