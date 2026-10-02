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

namespace Gs2\Guild\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for sendRequestByUserId: Send a join request by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#sendrequestbyuserid
 */
class SendRequestByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Destination Guild Name */
    private $targetGuildName;
    /** @var string Guild Member Metadata */
    private $metadata;
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
     * @return SendRequestByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SendRequestByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return SendRequestByUserIdRequest
     */
	public function withUserId(?string $userId): SendRequestByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Guild Model name */
	public function getGuildModelName(): ?string {
		return $this->guildModelName;
	}
    /** @param string|null $guildModelName Guild Model name */
	public function setGuildModelName(?string $guildModelName) {
		$this->guildModelName = $guildModelName;
	}
    /**
     * @param string|null $guildModelName Guild Model name
     * @return SendRequestByUserIdRequest
     */
	public function withGuildModelName(?string $guildModelName): SendRequestByUserIdRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Destination Guild Name */
	public function getTargetGuildName(): ?string {
		return $this->targetGuildName;
	}
    /** @param string|null $targetGuildName Destination Guild Name */
	public function setTargetGuildName(?string $targetGuildName) {
		$this->targetGuildName = $targetGuildName;
	}
    /**
     * @param string|null $targetGuildName Destination Guild Name
     * @return SendRequestByUserIdRequest
     */
	public function withTargetGuildName(?string $targetGuildName): SendRequestByUserIdRequest {
		$this->targetGuildName = $targetGuildName;
		return $this;
	}
    /** @return string|null Guild Member Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Guild Member Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Guild Member Metadata
     * @return SendRequestByUserIdRequest
     */
	public function withMetadata(?string $metadata): SendRequestByUserIdRequest {
		$this->metadata = $metadata;
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
     * @return SendRequestByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SendRequestByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SendRequestByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SendRequestByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SendRequestByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withTargetGuildName(array_key_exists('targetGuildName', $data) && $data['targetGuildName'] !== null ? $data['targetGuildName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "guildModelName" => $this->getGuildModelName(),
            "targetGuildName" => $this->getTargetGuildName(),
            "metadata" => $this->getMetadata(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}