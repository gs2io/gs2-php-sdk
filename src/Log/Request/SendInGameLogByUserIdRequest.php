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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Log\Model\InGameLogTag;

/**
 * Request for sendInGameLogByUserId: Send in-game log by User ID
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#sendingamelogbyuserid
 */
class SendInGameLogByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var array Tags */
    private $tags;
    /** @var string Payload */
    private $payload;
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
     * @return SendInGameLogByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SendInGameLogByUserIdRequest {
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
     * @return SendInGameLogByUserIdRequest
     */
	public function withUserId(?string $userId): SendInGameLogByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Tags */
	public function getTags(): ?array {
		return $this->tags;
	}
    /** @param array|null $tags Tags */
	public function setTags(?array $tags) {
		$this->tags = $tags;
	}
    /**
     * @param array|null $tags Tags
     * @return SendInGameLogByUserIdRequest
     */
	public function withTags(?array $tags): SendInGameLogByUserIdRequest {
		$this->tags = $tags;
		return $this;
	}
    /** @return string|null Payload */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload Payload */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload Payload
     * @return SendInGameLogByUserIdRequest
     */
	public function withPayload(?string $payload): SendInGameLogByUserIdRequest {
		$this->payload = $payload;
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
     * @return SendInGameLogByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SendInGameLogByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SendInGameLogByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SendInGameLogByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SendInGameLogByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTags(!array_key_exists('tags', $data) || $data['tags'] === null ? null : array_map(
                function ($item) {
                    return InGameLogTag::fromJson($item);
                },
                $data['tags']
            ))
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "tags" => $this->getTags() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTags()
            ),
            "payload" => $this->getPayload(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}