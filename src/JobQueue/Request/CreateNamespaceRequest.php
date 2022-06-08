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

namespace Gs2\JobQueue\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\JobQueue\Model\NotificationSetting;
use Gs2\JobQueue\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var bool */
    private $enableAutoRun;
    /** @var NotificationSetting */
    private $pushNotification;
    /** @var NotificationSetting */
    private $runNotification;
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
	public function getEnableAutoRun(): ?bool {
		return $this->enableAutoRun;
	}
	public function setEnableAutoRun(?bool $enableAutoRun) {
		$this->enableAutoRun = $enableAutoRun;
	}
	public function withEnableAutoRun(?bool $enableAutoRun): CreateNamespaceRequest {
		$this->enableAutoRun = $enableAutoRun;
		return $this;
	}
	public function getPushNotification(): ?NotificationSetting {
		return $this->pushNotification;
	}
	public function setPushNotification(?NotificationSetting $pushNotification) {
		$this->pushNotification = $pushNotification;
	}
	public function withPushNotification(?NotificationSetting $pushNotification): CreateNamespaceRequest {
		$this->pushNotification = $pushNotification;
		return $this;
	}
	public function getRunNotification(): ?NotificationSetting {
		return $this->runNotification;
	}
	public function setRunNotification(?NotificationSetting $runNotification) {
		$this->runNotification = $runNotification;
	}
	public function withRunNotification(?NotificationSetting $runNotification): CreateNamespaceRequest {
		$this->runNotification = $runNotification;
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
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withEnableAutoRun(array_key_exists('enableAutoRun', $data) ? $data['enableAutoRun'] : null)
            ->withPushNotification(array_key_exists('pushNotification', $data) && $data['pushNotification'] !== null ? NotificationSetting::fromJson($data['pushNotification']) : null)
            ->withRunNotification(array_key_exists('runNotification', $data) && $data['runNotification'] !== null ? NotificationSetting::fromJson($data['runNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "enableAutoRun" => $this->getEnableAutoRun(),
            "pushNotification" => $this->getPushNotification() !== null ? $this->getPushNotification()->toJson() : null,
            "runNotification" => $this->getRunNotification() !== null ? $this->getRunNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}