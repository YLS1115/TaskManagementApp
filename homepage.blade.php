<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Management System</title>
  <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
</head>
<body>
<aside class="side-menu">
    <h3>Menu</h3>
    <br>
    <ul>
      <li><a href="{{ url('homepage') }}">Homepage</a></li>
      <li><a href="{{ url('profile') }}">Profile</a></li>
      <li><a href="{{ url('welcome') }}">Logout</a></li>
    </ul>
</aside>
  <div class="container">
    <header class="header">
      <div class="task-types">
        <button class="type-badge type-task">Due</button>
        <button class="type-badge type-story">In-Progress</button>
        <button class="type-badge type-bug">Done</button>
      </div>
      <div class="actions">
        <button class="new-task-btn" onclick="window.location.href='{{ url('newtask') }}'"">New Task</button>
      </div>
    </header>

    <main>
      </main>
  </div>

  <script>
    // Basic drag and drop functionality
    const taskCards = document.querySelectorAll('.task-card');
    const columns = document.querySelectorAll('.task-list');

    taskCards.forEach(card => {
      card.addEventListener('dragstart', () => {
        card.classList.add('dragging');
      });

      card.addEventListener('dragend', () => {
        card.classList.remove('dragging');
      });
    });

    columns.forEach(column => {
      column.addEventListener('dragover', e => {
        e.preventDefault();
        const draggingCard = document.querySelector('.dragging');
        const cardAfter = getCardAfterDraggedCard(column, e.clientY);

        if (cardAfter) {
          column.insertBefore(draggingCard, cardAfter);
        } else {
          column.appendChild(draggingCard);
        }
      });
    });

    function getCardAfterDraggedCard(column, yDraggedCard) {
      const cards = [...column.querySelectorAll('.task-card:not(.dragging)')];

      return cards.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = yDraggedCard - box.top - box.height / 2;

        if (offset < 0 && offset > closest.offset) {
          return { offset: offset, element: child };
        } else {
          return closest;
        }
      }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
  </script>
</body>
</html>