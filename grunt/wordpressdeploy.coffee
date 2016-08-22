module.exports =
  options:
    # backups_dir: "backups"
    rsync_args: [
      "--verbose", "--progress", "-rlpt", "--compress", "--omit-dir-times",
      # "--delete",
      # "--dry-run"
    ]
    exclusions: [
      "Gruntfile.*"
      ".git/"
      "tmp/*"
      "backups/"
      "wp-config.php"
      "composer.json"
      "composer.lock"
      "README.md"
      ".gitignore"
      "package.json"
      "node_modules"
      ".DS_Store"
      "sftp-config.json"
      "codekit-config.json"
      "config.codekit"
      # "*.less"  # Commented out for pushing plugins/themes that use LESS
      "backwpup-*"
      "grunt"
      "vendor"
      "*.coffee"
      "deployconfig.*"
      ".codekit-cache/"      
      # Grunt Build
      "releases/"
      "build/"
      # For Use with Roots Theme Setup
      "assets/less/"
      "assets/js/plugins"
      ".editorconfig" 
      ".bowerrc" 
      "bower.json"       
      # Theme-specific Exclusions
      "_Project images/"
    ]

  local:
    title: "Local"
    database: "laflood"
    table_prefix: "wp_"
    table_exclusions : [
    ]
    user: "<%= deployconfig.local.db_user %>"
    pass: "<%= deployconfig.local.db_pass %>"
    host: "localhost"
    url: "//laflood.dev"
    path:
      theme   : "<%= deployconfig.local.wp_content_path %>/themes/<%= theme_name %>/build/"
      uploads : "<%= deployconfig.local.wp_content_path %>/uploads/"
      plugins : "<%= deployconfig.local.wp_content_path %>/plugins/"


  # ==========  Start Environment Definitions  ==========


  dev:
    title: "dev.lafloodrecovery.com"
    database: "laflood-dev"
    table_prefix: "wp_"
    table_exclusions : [
      # "_wf" # Will exclude with " NOT LIKE '%_wf%' " SQL statement
    ]        
    user: "<%= deployconfig.dev.db_user %>"
    pass: "<%= deployconfig.dev.db_pass %>"
    host: "127.0.0.1"
    url: "//dev.lafloodrecovery.com"
    path:
      theme   : "<%= deployconfig.dev.wp_content_path %>/themes/<%= theme_name %>/"
      uploads : "<%= deployconfig.dev.wp_content_path %>/uploads/"
      plugins : "<%= deployconfig.dev.wp_content_path %>/plugins/"
    ssh_host: "serverpilot@104.131.111.162"

  prod:
    title: "lafloodrecovery.com"
    database: "laflood"
    table_prefix: "wp_"
    table_exclusions : [
      # "_wf" # Will exclude with " NOT LIKE '%_wf%' " SQL statement
    ]        
    user: "<%= deployconfig.prod.db_user %>"
    pass: "<%= deployconfig.prod.db_pass %>"
    host: "127.0.0.1"
    url: "//lafloodrecovery.com"
    path:
      theme   : "<%= deployconfig.prod.wp_content_path %>/themes/<%= theme_name %>/"
      uploads : "<%= deployconfig.prod.wp_content_path %>/uploads/"
      plugins : "<%= deployconfig.prod.wp_content_path %>/plugins/"
    ssh_host: "serverpilot@104.131.111.162"
