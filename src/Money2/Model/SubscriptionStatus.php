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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Subscription status
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#subscriptionstatus
 */
class SubscriptionStatus implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Store Subscription Content Model name
	 */
	private $contentName;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var int Expiration time
	 */
	private $expiresAt;
	/**
     * @var array Subscription status details
	 */
	private $detail;
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
     * @return SubscriptionStatus
     */
	public function withUserId(?string $userId): SubscriptionStatus {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Store Subscription Content Model name */
	public function getContentName(): ?string {
		return $this->contentName;
	}
    /** @param string|null $contentName Store Subscription Content Model name */
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
    /**
     * @param string|null $contentName Store Subscription Content Model name
     * @return SubscriptionStatus
     */
	public function withContentName(?string $contentName): SubscriptionStatus {
		$this->contentName = $contentName;
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
     * @return SubscriptionStatus
     */
	public function withStatus(?string $status): SubscriptionStatus {
		$this->status = $status;
		return $this;
	}
    /** @return int|null Expiration time */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Expiration time */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Expiration time
     * @return SubscriptionStatus
     */
	public function withExpiresAt(?int $expiresAt): SubscriptionStatus {
		$this->expiresAt = $expiresAt;
		return $this;
	}
    /** @return array|null Subscription status details */
	public function getDetail(): ?array {
		return $this->detail;
	}
    /** @param array|null $detail Subscription status details */
	public function setDetail(?array $detail) {
		$this->detail = $detail;
	}
    /**
     * @param array|null $detail Subscription status details
     * @return SubscriptionStatus
     */
	public function withDetail(?array $detail): SubscriptionStatus {
		$this->detail = $detail;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscriptionStatus {
        if ($data === null) {
            return null;
        }
        return (new SubscriptionStatus())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withDetail(!array_key_exists('detail', $data) || $data['detail'] === null ? null : array_map(
                function ($item) {
                    return SubscribeTransaction::fromJson($item);
                },
                $data['detail']
            ));
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "contentName" => $this->getContentName(),
            "status" => $this->getStatus(),
            "expiresAt" => $this->getExpiresAt(),
            "detail" => $this->getDetail() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDetail()
            ),
        );
    }
}