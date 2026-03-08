from PIL import Image

img = Image.open('images/home-1/title-bg.png')
img = img.convert("RGBA")
pixels = img.load()

width, height = img.size
# Let's erase the M logo. It's at the top center. 
# Box frame is around the image edges? 
# So if we erase x from 300 to 600, and y from 0 to 120, we should erase the logo.
for y in range(0, 150):
    for x in range(300, 600):
        # We only want to erase the logo. The top border line is at some y > 100?
        # Let's just erase everything in this top center box to make sure the logo is gone.
        pixels[x, y] = (0, 0, 0, 0)

img.save('images/home-1/title-bg-clean.png')
print(f"Saved to images/home-1/title-bg-clean.png. Width={width}, Height={height}")
