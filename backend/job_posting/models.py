from django.db import models

# Create your models here.
class JobCategory(models.Model):
    JOBS_CHOICES = [
        ('electrician', 'Electrician'),
        ('plumber', 'Plumber'),
        ('cleaner', 'Cleaner'),
    ]
    name = models.CharField(choices=JOBS_CHOICES, max_length=20)

    def __str__(self):
        return self.name

class JobWorker(models.Model):
    first_name = models.CharField(max_length=200)
    last_name = models.CharField(max_length=200)
    # profile_pic = models.ImageField(upload_to='profile_pics', default='profile_pics/default.jpeg')
    description = models.TextField()
    price = models.FloatField()
    job_category = models.ForeignKey(JobCategory, on_delete=models.CASCADE)

    def __str__(self):
        return f'{self.first_name} {self.last_name}'
    

# class JobPosting(models.Model):
#     pass
