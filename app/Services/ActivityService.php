<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class ActivityService
{
    public static function log($type, $description, $data = [], $projectId = null)
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $request = request();

        return Activity::create([
            'user_id' => $user->id,
            'project_id' => $projectId,
            'type' => $type,
            'description' => $description,
            'data' => $data,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
    }

    public static function logProjectCreated(Project $project)
    {
        return self::log(
            Activity::TYPE_PROJECT_CREATED,
            "Created project: {$project->title}",
            ['project_title' => $project->title, 'project_id' => $project->id],
            $project->id
        );
    }

    public static function logProjectUpdated(Project $project, $changes = [])
    {
        return self::log(
            Activity::TYPE_PROJECT_UPDATED,
            "Updated project: {$project->title}",
            ['project_title' => $project->title, 'project_id' => $project->id, 'changes' => $changes],
            $project->id
        );
    }

    public static function logProjectApproved(Project $project)
    {
        return self::log(
            Activity::TYPE_PROJECT_APPROVED,
            "Project approved: {$project->title}",
            ['project_title' => $project->title, 'project_id' => $project->id],
            $project->id
        );
    }

    public static function logProjectRejected(Project $project, $reason = null)
    {
        return self::log(
            Activity::TYPE_PROJECT_REJECTED,
            "Project rejected: {$project->title}" . ($reason ? " - {$reason}" : ''),
            ['project_title' => $project->title, 'project_id' => $project->id, 'reason' => $reason],
            $project->id
        );
    }

    public static function logAssetUploaded($projectId, $fileName, $fileSize = null)
    {
        return self::log(
            Activity::TYPE_ASSET_UPLOADED,
            "Uploaded asset: {$fileName}",
            ['file_name' => $fileName, 'file_size' => $fileSize],
            $projectId
        );
    }

    public static function logAssetDownloaded($projectId, $fileName)
    {
        return self::log(
            Activity::TYPE_ASSET_DOWNLOADED,
            "Downloaded asset: {$fileName}",
            ['file_name' => $fileName],
            $projectId
        );
    }

    public static function logLogin(User $user)
    {
        return self::log(
            Activity::TYPE_LOGIN,
            "User logged in",
            ['user_name' => $user->name],
            null
        );
    }

    public static function logProfileUpdated(User $user, $changes = [])
    {
        return self::log(
            Activity::TYPE_PROFILE_UPDATED,
            "Profile updated",
            ['user_name' => $user->name, 'changes' => $changes],
            null
        );
    }

    public static function getUserActivities($userId, $limit = 10)
    {
        return Activity::where('user_id', $userId)
            ->with(['project', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public static function getProjectActivities($projectId, $limit = 10)
    {
        return Activity::where('project_id', $projectId)
            ->with(['user', 'project'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
