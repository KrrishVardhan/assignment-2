<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel</title>
    <link rel="stylesheet" href="style/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="bg-background text-foreground">
    <header class="flex items-center justify-between px-8 py-4 border-b border-border">
        <div>
            <h1 class="text-3xl font-bold tracking-tight chakra-petch-bold text-primary">
                Console Controller
            </h1>
            <p class="text-sm text-muted-foreground">
                System Management Interface
            </p>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 rounded-lg border border-border hover:bg-secondary transition-colors cursor-pointer">
                Security Terminal
            </button>

            <button id="access-profile"
                class="px-5 py-2 rounded-lg bg-accent text-accent-foreground hover:opacity-90 transition-opacity font-medium cursor-pointer">
                Access Profile
            </button>
        </div>
    </header>