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


/**
 * Approved Version
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#acceptversion
 */
class AcceptVersion implements IModel {
	/**
     * @var string Approved Version GRN
	 */
	private $acceptVersionId;
	/**
     * @var string Version Name
	 */
	private $versionName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var Version Version
	 */
	private $version;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Approved Version GRN */
	public function getAcceptVersionId(): ?string {
		return $this->acceptVersionId;
	}
    /** @param string|null $acceptVersionId Approved Version GRN */
	public function setAcceptVersionId(?string $acceptVersionId) {
		$this->acceptVersionId = $acceptVersionId;
	}
    /**
     * @param string|null $acceptVersionId Approved Version GRN
     * @return AcceptVersion
     */
	public function withAcceptVersionId(?string $acceptVersionId): AcceptVersion {
		$this->acceptVersionId = $acceptVersionId;
		return $this;
	}
    /** @return string|null Version Name */
	public function getVersionName(): ?string {
		return $this->versionName;
	}
    /** @param string|null $versionName Version Name */
	public function setVersionName(?string $versionName) {
		$this->versionName = $versionName;
	}
    /**
     * @param string|null $versionName Version Name
     * @return AcceptVersion
     */
	public function withVersionName(?string $versionName): AcceptVersion {
		$this->versionName = $versionName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return AcceptVersion
     */
	public function withUserId(?string $userId): AcceptVersion {
		$this->userId = $userId;
		return $this;
	}
    /** @return Version|null Version */
	public function getVersion(): ?Version {
		return $this->version;
	}
    /** @param Version|null $version Version */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}
    /**
     * @param Version|null $version Version
     * @return AcceptVersion
     */
	public function withVersion(?Version $version): AcceptVersion {
		$this->version = $version;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return AcceptVersion
     */
	public function withStatus(?string $status): AcceptVersion {
		$this->status = $status;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return AcceptVersion
     */
	public function withCreatedAt(?int $createdAt): AcceptVersion {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return AcceptVersion
     */
	public function withUpdatedAt(?int $updatedAt): AcceptVersion {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return AcceptVersion
     */
	public function withRevision(?int $revision): AcceptVersion {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?AcceptVersion {
        if ($data === null) {
            return null;
        }
        return (new AcceptVersion())
            ->withAcceptVersionId(array_key_exists('acceptVersionId', $data) && $data['acceptVersionId'] !== null ? $data['acceptVersionId'] : null)
            ->withVersionName(array_key_exists('versionName', $data) && $data['versionName'] !== null ? $data['versionName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? Version::fromJson($data['version']) : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "acceptVersionId" => $this->getAcceptVersionId(),
            "versionName" => $this->getVersionName(),
            "userId" => $this->getUserId(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}