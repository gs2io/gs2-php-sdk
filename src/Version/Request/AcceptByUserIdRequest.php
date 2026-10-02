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
 * Request for acceptByUserId: Approve current version by User ID
 *
 * @see https://docs.gs2.io/api_reference/version/sdk/#acceptbyuserid
 */
class AcceptByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Version Name */
    private $versionName;
    /** @var string User ID */
    private $userId;
    /** @var Version Version to be Approved (Agreed Upon) */
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
     * @return AcceptByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AcceptByUserIdRequest {
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
     * @return AcceptByUserIdRequest
     */
	public function withVersionName(?string $versionName): AcceptByUserIdRequest {
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
     * @return AcceptByUserIdRequest
     */
	public function withUserId(?string $userId): AcceptByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return Version|null Version to be Approved (Agreed Upon) */
	public function getVersion(): ?Version {
		return $this->version;
	}
    /** @param Version|null $version Version to be Approved (Agreed Upon) */
	public function setVersion(?Version $version) {
		$this->version = $version;
	}
    /**
     * @param Version|null $version Version to be Approved (Agreed Upon)
     * @return AcceptByUserIdRequest
     */
	public function withVersion(?Version $version): AcceptByUserIdRequest {
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
     * @return AcceptByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AcceptByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcceptByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcceptByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AcceptByUserIdRequest())
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