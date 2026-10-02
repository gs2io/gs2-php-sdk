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

namespace Gs2\Ranking2\Model;

use Gs2\Core\Model\IModel;


/**
 * Subscribed User Information
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#subscribeuser
 */
class SubscribeUser implements IModel {
	/**
     * @var string Subscribe Ranking Model name
	 */
	private $rankingName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Subscribe Target User ID
	 */
	private $targetUserId;
    /** @return string|null Subscribe Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Subscribe Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Subscribe Ranking Model name
     * @return SubscribeUser
     */
	public function withRankingName(?string $rankingName): SubscribeUser {
		$this->rankingName = $rankingName;
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
     * @return SubscribeUser
     */
	public function withUserId(?string $userId): SubscribeUser {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Subscribe Target User ID */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}
    /** @param string|null $targetUserId Subscribe Target User ID */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}
    /**
     * @param string|null $targetUserId Subscribe Target User ID
     * @return SubscribeUser
     */
	public function withTargetUserId(?string $targetUserId): SubscribeUser {
		$this->targetUserId = $targetUserId;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeUser {
        if ($data === null) {
            return null;
        }
        return (new SubscribeUser())
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTargetUserId(array_key_exists('targetUserId', $data) && $data['targetUserId'] !== null ? $data['targetUserId'] : null);
    }

    public function toJson(): array {
        return array(
            "rankingName" => $this->getRankingName(),
            "userId" => $this->getUserId(),
            "targetUserId" => $this->getTargetUserId(),
        );
    }
}