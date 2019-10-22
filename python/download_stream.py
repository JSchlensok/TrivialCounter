import subprocess
import sys

url = str(sys.argv[1])
cmd = ['ffmpeg', '-i', url, '-c', 'copy', '-acodec', 'flac', 'download.flac']
subprocess.Popen(cmd)