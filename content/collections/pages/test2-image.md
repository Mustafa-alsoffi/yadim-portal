---
id: 2e5a9496-8b7b-451c-98cc-4854d35c3fb1
blueprint: page
title: 'test2 image'
updated_by: 1
updated_at: 1716569520
---
Each container has its own settings, configurable permissions, and blueprint. One container might be a local filesystem with upload, download, rename, and move permissions enabled, and another could be a read-only remote S3 bucket or stock image service.

Containers can be created through the Control Panel and are defined as YAML files located in content/assets. Each container's filename becomes its handle.

# content/assets/assets.yaml
title: 'Assets'
disk: 'assets'
Each container implements a "disk", also known as a Laravel Filesystem. This native Laravel feature groups a driver, URL, location, and visibility together. Statamic includes a local disk on fresh installs. You can modify or delete it, but many sites can simply use it as is.

![image](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7BemC6l_zPgqD42eSKxE_hqyCFj5YmnrTYsLTNWNg9g&s)