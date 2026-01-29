# 🚀 Admin Panel Quick Start

## Access the Admin Panel

### Step 1: Login as Admin

1. Go to: **http://localhost:8000/login**
2. Enter credentials:
   ```
   Email: admin@erp.com
   Password: password
   ```
3. Click "Log in"

### Step 2: Access Admin Dashboard

Once logged in, go to: **http://localhost:8000/admin/dashboard**

Or click "Admin Panel" link if you add it to your navigation.

---

## Quick Actions

### View All Users
```
http://localhost:8000/admin/users
```

### Create New User
```
http://localhost:8000/admin/users/create
```

---

## Test Accounts

| Email | Password | Role | Purpose |
|-------|----------|------|---------|
| admin@erp.com | password | Admin | Full admin access |
| user@erp.com | password | User | Regular user (no admin access) |

---

## What You Can Do

✅ View dashboard with statistics  
✅ Manage all users (create, edit, delete)  
✅ Grant/revoke admin privileges  
✅ View user details  
✅ See verification status  

---

## Important Notes

⚠️ **You cannot**:
- Delete your own account
- Remove your own admin privileges

✅ **Security**:
- All admin routes require authentication
- Email verification required
- Only admins can access admin panel

---

## Need Help?

See **ADMIN_PANEL_GUIDE.md** for complete documentation.

---

## Next Steps

1. ✅ Login as admin
2. ✅ Explore the dashboard
3. ✅ Create a test user
4. ✅ Try editing and deleting users
5. ✅ Toggle admin privileges
6. 📚 Read the full guide to learn how it works

**Happy Learning! 🎓**
