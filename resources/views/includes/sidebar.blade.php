<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('public/images/user.png')}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div> 
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="{{route('admin.dahboard')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('publishers.list')}}">
                            <i class="material-icons">text_fields</i>
                            <span>Manage Publishers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('books.list')}}">
                            <i class="material-icons">layers</i>
                            <span>Manage Books</span>
                        </a>
                    </li> 
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>