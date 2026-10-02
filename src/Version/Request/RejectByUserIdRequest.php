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

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Version\Model\Version;

/**
 * Request for rejectByUserId: Reject current version by User ID
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#rejectbyuserid
 */
class RejectByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Version Name */
    private $versionName;
    /** @var string User ID */
    private $userId;
    /** @var Version Rejected Version */
    private $version;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return RejectByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): RejectByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return RejectByUserIdRequest
     */
	public function withVersionName(?string $versionName): RejectByUserIdRequest {
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
     * @return RejectByUserIdRequest
     */
	public function withUserId(?string $userId): RejectByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return Version|null Rejected Version */
	public function getVersion(): ?Version {
		return $this->version;
	}
    /** @param Version|null $version Rejected Version */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}
    /**
     * @param Version|null $version Rejected Version
     * @return RejectByUserIdRequest
     */
	public function withVersion(?Version $version): RejectByUserIdRequest {
		$this->version = $version;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return RejectByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): RejectByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): RejectByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?RejectByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new RejectByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withVersionName(array_key_exists('versionName', $data) && $data['versionName'] !== null ? $data['versionName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? Version::fromJson($data['version']) : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "versionName" => $this->getVersionName(),
            "userId" => $this->getUserId(),
            "version" => $this->getVersion() !== null ? $this->getVersion()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}