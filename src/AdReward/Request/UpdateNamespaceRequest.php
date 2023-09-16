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
use Gs2\AdReward\Model\NotificationSetting;
use Gs2\AdReward\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var AdMob */
    private $admob;
    /** @var UnityAd */
    private $unityAd;
    /** @var NotificationSetting */
    private $changePointNotification;
    /** @var LogSetting */
    private $logSetting;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
	public function getAdmob(): ?AdMob {
		return $this->admob;
	}
	public function setAdmob(?AdMob $admob) {
		$this->admob = $admob;
	}
	public function withAdmob(?AdMob $admob): UpdateNamespaceRequest {
		$this->admob = $admob;
		return $this;
	}
	public function getUnityAd(): ?UnityAd {
		return $this->unityAd;
	}
	public function setUnityAd(?UnityAd $unityAd) {
		$this->unityAd = $unityAd;
	}
	public function withUnityAd(?UnityAd $unityAd): UpdateNamespaceRequest {
		$this->unityAd = $unityAd;
		return $this;
	}
	public function getChangePointNotification(): ?NotificationSetting {
		return $this->changePointNotification;
	}
	public function setChangePointNotification(?NotificationSetting $changePointNotification) {
		$this->changePointNotification = $changePointNotification;
	}
	public function withChangePointNotification(?NotificationSetting $changePointNotification): UpdateNamespaceRequest {
		$this->changePointNotification = $changePointNotification;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): UpdateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withAdmob(array_key_exists('admob', $data) && $data['admob'] !== null ? AdMob::fromJson($data['admob']) : null)
            ->withUnityAd(array_key_exists('unityAd', $data) && $data['unityAd'] !== null ? UnityAd::fromJson($data['unityAd']) : null)
            ->withChangePointNotification(array_key_exists('changePointNotification', $data) && $data['changePointNotification'] !== null ? NotificationSetting::fromJson($data['changePointNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "admob" => $this->getAdmob() !== null ? $this->getAdmob()->toJson() : null,
            "unityAd" => $this->getUnityAd() !== null ? $this->getUnityAd()->toJson() : null,
            "changePointNotification" => $this->getChangePointNotification() !== null ? $this->getChangePointNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}