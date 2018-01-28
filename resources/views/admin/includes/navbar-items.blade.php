<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="frontend">Home</a>
            </div>
            <!-- Top Menu Items -->
           @include('admin.includes.top-menu-items')
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            @include ('admin.includes.sidebar-items')
    <br />
            <!-- /.navbar-collapse -->
        </nav>