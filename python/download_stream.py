import subprocess
import sys

url = str(sys.argv[1])
cmd = ['ffmpeg', '-i', url, '-c', 'copy', '-bsf:a', 'aac_adtstoasc', 'download.wav']
subprocess.Popen(cmd)