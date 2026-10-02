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

namespace Gs2\Ranking2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for putClusterRankingScoreByUserId: Register Cluster Ranking Score specifying User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putclusterrankingscorebyuserid
 */
class PutClusterRankingScoreByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Cluster Ranking Model name */
    private $rankingName;
    /** @var string Cluster Name */
    private $clusterName;
    /** @var string User ID */
    private $userId;
    /** @var int Score */
    private $score;
    /** @var string Metadata */
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
     * @return PutClusterRankingScoreByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): PutClusterRankingScoreByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Cluster Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Cluster Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Cluster Ranking Model name
     * @return PutClusterRankingScoreByUserIdRequest
     */
	public function withRankingName(?string $rankingName): PutClusterRankingScoreByUserIdRequest {
		$this->rankingName = $rankingName;
		return $this;
	}
    /** @return string|null Cluster Name */
	public function getClusterName(): ?string {
		return $this->clusterName;
	}
    /** @param string|null $clusterName Cluster Name */
	public function setClusterName(?string $clusterName) {
		$this->clusterName = $clusterName;
	}
    /**
     * @param string|null $clusterName Cluster Name
     * @return PutClusterRankingScoreByUserIdRequest
     */
	public function withClusterName(?string $clusterName): PutClusterRankingScoreByUserIdRequest {
		$this->clusterName = $clusterName;
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
     * @return PutClusterRankingScoreByUserIdRequest
     */
	public function withUserId(?string $userId): PutClusterRankingScoreByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Score */
	public function getScore(): ?int {
		return $this->score;
	}
    /** @param int|null $score Score */
	public function setScore(?int $score) {
		$this->score = $score;
	}
    /**
     * @param int|null $score Score
     * @return PutClusterRankingScoreByUserIdRequest
     */
	public function withScore(?int $score): PutClusterRankingScoreByUserIdRequest {
		$this->score = $score;
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
     * @return PutClusterRankingScoreByUserIdRequest
     */
	public function withMetadata(?string $metadata): PutClusterRankingScoreByUserIdRequest {
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
     * @return PutClusterRankingScoreByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): PutClusterRankingScoreByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PutClusterRankingScoreByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PutClusterRankingScoreByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PutClusterRankingScoreByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withClusterName(array_key_exists('clusterName', $data) && $data['clusterName'] !== null ? $data['clusterName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rankingName" => $this->getRankingName(),
            "clusterName" => $this->getClusterName(),
            "userId" => $this->getUserId(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}