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

namespace Gs2\Version\Model;

use Gs2\Core\Model\IModel;


class AcceptVersion implements IModel {
	/**
     * @var string
	 */
	private $acceptVersionId;
	/**
     * @var string
	 */
	private $versionName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var Version
	 */
	private $version;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getAcceptVersionId(): ?string {
		return $this->acceptVersionId;
	}

	public function setAcceptVersionId(?string $acceptVersionId) {
		$this->acceptVersionId = $acceptVersionId;
	}

	public function withAcceptVersionId(?string $acceptVersionId): AcceptVersion {
		$this->acceptVersionId = $acceptVersionId;
		return $this;
	}

	public function getVersionName(): ?string {
		return $this->versionName;
	}

	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}

	public function withVersionName(?string $versionName): AcceptVersion {
		$this->versionName = $versionName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): AcceptVersion {
		$this->userId = $userId;
		return $this;
	}

	public function getVersion(): ?Version {
		return $this->version;
	}

	public function setVersion(?Version $version) {
		$this->version = $version;
	}

	public function withVersion(?Version $version): AcceptVersion {
		$this->version = $version;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): AcceptVersion {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): AcceptVersion {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?AcceptVersion {
        if ($data === null) {
            return null;
        }
        return (new AcceptVersion())
            ->withAcceptVersionId(empty($data['acceptVersionId']) ? null : $data['acceptVersionId'])
            ->withVersionName(empty($data['versionName']) ? null : $data['versionName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withVersion(empty($data['version']) ? null : Version::fromJson($data['version']))
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "acceptVersionId" => $this->getAcceptVersionId(),
            "versionName" => $this->getVersionName(),
            "userId" => $this->getUserId(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}