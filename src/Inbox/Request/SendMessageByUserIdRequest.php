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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Inbox\Model\AcquireAction;
use Gs2\Inbox\Model\TimeSpan;

/**
 * Request for sendMessageByUserId: Send a message by User ID
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#sendmessagebyuserid
 */
class SendMessageByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Metadata */
    private $metadata;
    /** @var array Acquire Actions on Open */
    private $readAcquireActions;
    /** @var int Expiration datetime */
    private $expiresAt;
    /** @var TimeSpan The period from the time a message was received (reference time) until it was deleted */
    private $expiresTimeSpan;
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
     * @return SendMessageByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SendMessageByUserIdRequest {
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
     * @return SendMessageByUserIdRequest
     */
	public function withUserId(?string $userId): SendMessageByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return SendMessageByUserIdRequest
     */
	public function withMetadata(?string $metadata): SendMessageByUserIdRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null Acquire Actions on Open */
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}
    /** @param array|null $readAcquireActions Acquire Actions on Open */
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}
    /**
     * @param array|null $readAcquireActions Acquire Actions on Open
     * @return SendMessageByUserIdRequest
     */
	public function withReadAcquireActions(?array $readAcquireActions): SendMessageByUserIdRequest {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
    /** @return int|null Expiration datetime */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Expiration datetime */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Expiration datetime
     * @return SendMessageByUserIdRequest
     */
	public function withExpiresAt(?int $expiresAt): SendMessageByUserIdRequest {
		$this->expiresAt = $expiresAt;
		return $this;
	}
    /** @return TimeSpan|null The period from the time a message was received (reference time) until it was deleted */
	public function getExpiresTimeSpan(): ?TimeSpan {
		return $this->expiresTimeSpan;
	}
    /** @param TimeSpan|null $expiresTimeSpan The period from the time a message was received (reference time) until it was deleted */
	public function setExpiresTimeSpan(?TimeSpan $expiresTimeSpan) {
		$this->expiresTimeSpan = $expiresTimeSpan;
	}
    /**
     * @param TimeSpan|null $expiresTimeSpan The period from the time a message was received (reference time) until it was deleted
     * @return SendMessageByUserIdRequest
     */
	public function withExpiresTimeSpan(?TimeSpan $expiresTimeSpan): SendMessageByUserIdRequest {
		$this->expiresTimeSpan = $expiresTimeSpan;
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
     * @return SendMessageByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SendMessageByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SendMessageByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SendMessageByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SendMessageByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withReadAcquireActions(!array_key_exists('readAcquireActions', $data) || $data['readAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['readAcquireActions']
            ))
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withExpiresTimeSpan(array_key_exists('expiresTimeSpan', $data) && $data['expiresTimeSpan'] !== null ? TimeSpan::fromJson($data['expiresTimeSpan']) : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "metadata" => $this->getMetadata(),
            "readAcquireActions" => $this->getReadAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReadAcquireActions()
            ),
            "expiresAt" => $this->getExpiresAt(),
            "expiresTimeSpan" => $this->getExpiresTimeSpan() !== null ? $this->getExpiresTimeSpan()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}