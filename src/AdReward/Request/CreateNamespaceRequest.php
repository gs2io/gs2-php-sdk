<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\AdReward\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\AdReward\Model\AdMob;
use Gs2\AdReward\Model\UnityAd;
use Gs2\AdReward\Model\AppLovinMax;
use Gs2\AdReward\Model\NotificationSetting;
use Gs2\AdReward\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var AdMob */
    private $admob;
    /** @var UnityAd */
    private $unityAd;
    /** @var array */
    private $appLovinMaxes;
    /** @var string */
    private $description;
    /** @var NotificationSetting */
    private $changePointNotification;
    /** @var LogSetting */
    private $logSetting;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateNamespaceRequest {
		$this->name = $name;
		return $this;
	}
	public function getAdmob(): ?AdMob {
		return $this->admob;
	}
	public function setAdmob(?AdMob $admob) {
		$this->admob = $admob;
	}
	public function withAdmob(?AdMob $admob): CreateNamespaceRequest {
		$this->admob = $admob;
		return $this;
	}
	public function getUnityAd(): ?UnityAd {
		return $this->unityAd;
	}
	public function setUnityAd(?UnityAd $unityAd) {
		$this->unityAd = $unityAd;
	}
	public function withUnityAd(?UnityAd $unityAd): CreateNamespaceRequest {
		$this->unityAd = $unityAd;
		return $this;
	}
	public function getAppLovinMaxes(): ?array {
		return $this->appLovinMaxes;
	}
	public function setAppLovinMaxes(?array $appLovinMaxes) {
		$this->appLovinMaxes = $appLovinMaxes;
	}
	public function withAppLovinMaxes(?array $appLovinMaxes): CreateNamespaceRequest {
		$this->appLovinMaxes = $appLovinMaxes;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
	public function getChangePointNotification(): ?NotificationSetting {
		return $this->changePointNotification;
	}
	public function setChangePointNotification(?NotificationSetting $changePointNotification) {
		$this->changePointNotification = $changePointNotification;
	}
	public function withChangePointNotification(?NotificationSetting $changePointNotification): CreateNamespaceRequest {
		$this->changePointNotification = $changePointNotification;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): CreateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateNamespaceRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withAdmob(array_key_exists('admob', $data) && $data['admob'] !== null ? AdMob::fromJson($data['admob']) : null)
            ->withUnityAd(array_key_exists('unityAd', $data) && $data['unityAd'] !== null ? UnityAd::fromJson($data['unityAd']) : null)
            ->withAppLovinMaxes(array_map(
                function ($item) {
                    return AppLovinMax::fromJson($item);
                },
                array_key_exists('appLovinMaxes', $data) && $data['appLovinMaxes'] !== null ? $data['appLovinMaxes'] : []
            ))
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withChangePointNotification(array_key_exists('changePointNotification', $data) && $data['changePointNotification'] !== null ? NotificationSetting::fromJson($data['changePointNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "admob" => $this->getAdmob() !== null ? $this->getAdmob()->toJson() : null,
            "unityAd" => $this->getUnityAd() !== null ? $this->getUnityAd()->toJson() : null,
            "appLovinMaxes" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAppLovinMaxes() !== null && $this->getAppLovinMaxes() !== null ? $this->getAppLovinMaxes() : []
            ),
            "description" => $this->getDescription(),
            "changePointNotification" => $this->getChangePointNotification() !== null ? $this->getChangePointNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}