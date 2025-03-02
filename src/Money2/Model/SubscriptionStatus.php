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


class SubscriptionStatus implements IModel {
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $contentName;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var int
	 */
	private $expiresAt;
	/**
     * @var array
	 */
	private $detail;
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SubscriptionStatus {
		$this->userId = $userId;
		return $this;
	}
	public function getContentName(): ?string {
		return $this->contentName;
	}
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
	public function withContentName(?string $contentName): SubscriptionStatus {
		$this->contentName = $contentName;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): SubscriptionStatus {
		$this->status = $status;
		return $this;
	}
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
	public function withExpiresAt(?int $expiresAt): SubscriptionStatus {
		$this->expiresAt = $expiresAt;
		return $this;
	}
	public function getDetail(): ?array {
		return $this->detail;
	}
	public function setDetail(?array $detail) {
		$this->detail = $detail;
	}
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
            ->withDetail(array_map(
                function ($item) {
                    return SubscribeTransaction::fromJson($item);
                },
                array_key_exists('detail', $data) && $data['detail'] !== null ? $data['detail'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "contentName" => $this->getContentName(),
            "status" => $this->getStatus(),
            "expiresAt" => $this->getExpiresAt(),
            "detail" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDetail() !== null && $this->getDetail() !== null ? $this->getDetail() : []
            ),
        );
    }
}