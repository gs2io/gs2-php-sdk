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

namespace Gs2\Ranking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getScoreByUserId: Get score by User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#getscorebyuserid
 */
class GetScoreByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Category Name */
    private $categoryName;
    /** @var string User ID */
    private $userId;
    /** @var string User ID of the user who earned the score */
    private $scorerUserId;
    /** @var string Score Unique ID */
    private $uniqueId;
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
     * @return GetScoreByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetScoreByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Category Name */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
    /** @param string|null $categoryName Category Name */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
    /**
     * @param string|null $categoryName Category Name
     * @return GetScoreByUserIdRequest
     */
	public function withCategoryName(?string $categoryName): GetScoreByUserIdRequest {
		$this->categoryName = $categoryName;
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
     * @return GetScoreByUserIdRequest
     */
	public function withUserId(?string $userId): GetScoreByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null User ID of the user who earned the score */
	public function getScorerUserId(): ?string {
		return $this->scorerUserId;
	}
    /** @param string|null $scorerUserId User ID of the user who earned the score */
	public function setScorerUserId(?string $scorerUserId) {
		$this->scorerUserId = $scorerUserId;
	}
    /**
     * @param string|null $scorerUserId User ID of the user who earned the score
     * @return GetScoreByUserIdRequest
     */
	public function withScorerUserId(?string $scorerUserId): GetScoreByUserIdRequest {
		$this->scorerUserId = $scorerUserId;
		return $this;
	}
    /** @return string|null Score Unique ID */
	public function getUniqueId(): ?string {
		return $this->uniqueId;
	}
    /** @param string|null $uniqueId Score Unique ID */
	public function setUniqueId(?string $uniqueId) {
		$this->uniqueId = $uniqueId;
	}
    /**
     * @param string|null $uniqueId Score Unique ID
     * @return GetScoreByUserIdRequest
     */
	public function withUniqueId(?string $uniqueId): GetScoreByUserIdRequest {
		$this->uniqueId = $uniqueId;
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
     * @return GetScoreByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetScoreByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetScoreByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetScoreByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScorerUserId(array_key_exists('scorerUserId', $data) && $data['scorerUserId'] !== null ? $data['scorerUserId'] : null)
            ->withUniqueId(array_key_exists('uniqueId', $data) && $data['uniqueId'] !== null ? $data['uniqueId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "scorerUserId" => $this->getScorerUserId(),
            "uniqueId" => $this->getUniqueId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}