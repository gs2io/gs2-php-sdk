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

namespace Gs2\Realtime\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Realtime\Model\NotificationSetting;
use Gs2\Realtime\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $serverType;
    /** @var string */
    private $serverSpec;
    /** @var NotificationSetting */
    private $createNotification;
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

	public function getServerType(): ?string {
		return $this->serverType;
	}

	public function setServerType(?string $serverType) {
		$this->serverType = $serverType;
	}

	public function withServerType(?string $serverType): CreateNamespaceRequest {
		$this->serverType = $serverType;
		return $this;
	}

	public function getServerSpec(): ?string {
		return $this->serverSpec;
	}

	public function setServerSpec(?string $serverSpec) {
		$this->serverSpec = $serverSpec;
	}

	public function withServerSpec(?string $serverSpec): CreateNamespaceRequest {
		$this->serverSpec = $serverSpec;
		return $this;
	}

	public function getCreateNotification(): ?NotificationSetting {
		return $this->createNotification;
	}

	public function setCreateNotification(?NotificationSetting $createNotification) {
		$this->createNotification = $createNotification;
	}

	public function withCreateNotification(?NotificationSetting $createNotification): CreateNamespaceRequest {
		$this->createNotification = $createNotification;
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
            ->withServerType(array_key_exists('serverType', $data) && $data['serverType'] !== null ? $data['serverType'] : null)
            ->withServerSpec(array_key_exists('serverSpec', $data) && $data['serverSpec'] !== null ? $data['serverSpec'] : null)
            ->withCreateNotification(array_key_exists('createNotification', $data) && $data['createNotification'] !== null ? NotificationSetting::fromJson($data['createNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "serverType" => $this->getServerType(),
            "serverSpec" => $this->getServerSpec(),
            "createNotification" => $this->getCreateNotification() !== null ? $this->getCreateNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}