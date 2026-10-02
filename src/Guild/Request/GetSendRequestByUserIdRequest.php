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
 * Request for getSendRequestByUserId: Get Sent Join Request by User ID
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#getsendrequestbyuserid
 */
class GetSendRequestByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Guild Model name */
    private $guildModelName;
    /** @var string Target Guild Name */
    private $targetGuildName;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetSendRequestByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetSendRequestByUserIdRequest {
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
     * @return GetSendRequestByUserIdRequest
     */
	public function withUserId(?string $userId): GetSendRequestByUserIdRequest {
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
     * @return GetSendRequestByUserIdRequest
     */
	public function withGuildModelName(?string $guildModelName): GetSendRequestByUserIdRequest {
		$this->guildModelName = $guildModelName;
		return $this;
	}
    /** @return string|null Target Guild Name */
	public function getTargetGuildName(): ?string {
		return $this->targetGuildName;
	}
    /** @param string|null $targetGuildName Target Guild Name */
	public function setTargetGuildName(?string $targetGuildName) {
		$this->targetGuildName = $targetGuildName;
	}
    /**
     * @param string|null $targetGuildName Target Guild Name
     * @return GetSendRequestByUserIdRequest
     */
	public function withTargetGuildName(?string $targetGuildName): GetSendRequestByUserIdRequest {
		$this->targetGuildName = $targetGuildName;
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
     * @return GetSendRequestByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetSendRequestByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSendRequestByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSendRequestByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGuildModelName(array_key_exists('guildModelName', $data) && $data['guildModelName'] !== null ? $data['guildModelName'] : null)
            ->withTargetGuildName(array_key_exists('targetGuildName', $data) && $data['targetGuildName'] !== null ? $data['targetGuildName'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "guildModelName" => $this->getGuildModelName(),
            "targetGuildName" => $this->getTargetGuildName(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}