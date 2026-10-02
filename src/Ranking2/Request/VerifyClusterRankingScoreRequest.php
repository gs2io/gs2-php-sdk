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
 * Request for verifyClusterRankingScore: Verify the score of the cluster ranking
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#verifyclusterrankingscore
 */
class VerifyClusterRankingScoreRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Cluster Ranking Model name */
    private $rankingName;
    /** @var string Cluster Name */
    private $clusterName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Season */
    private $season;
    /** @var int Score */
    private $score;
    /** @var bool Whether to multiply the value used for verification when specifying the quantity */
    private $multiplyValueSpecifyingQuantity;
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
     * @return VerifyClusterRankingScoreRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyClusterRankingScoreRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return VerifyClusterRankingScoreRequest
     */
	public function withAccessToken(?string $accessToken): VerifyClusterRankingScoreRequest {
		$this->accessToken = $accessToken;
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
     * @return VerifyClusterRankingScoreRequest
     */
	public function withRankingName(?string $rankingName): VerifyClusterRankingScoreRequest {
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
     * @return VerifyClusterRankingScoreRequest
     */
	public function withClusterName(?string $clusterName): VerifyClusterRankingScoreRequest {
		$this->clusterName = $clusterName;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyClusterRankingScoreRequest
     */
	public function withVerifyType(?string $verifyType): VerifyClusterRankingScoreRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Season */
	public function getSeason(): ?int {
		return $this->season;
	}
    /** @param int|null $season Season */
	public function setSeason(?int $season) {
		$this->season = $season;
	}
    /**
     * @param int|null $season Season
     * @return VerifyClusterRankingScoreRequest
     */
	public function withSeason(?int $season): VerifyClusterRankingScoreRequest {
		$this->season = $season;
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
     * @return VerifyClusterRankingScoreRequest
     */
	public function withScore(?int $score): VerifyClusterRankingScoreRequest {
		$this->score = $score;
		return $this;
	}
    /** @return bool|null Whether to multiply the value used for verification when specifying the quantity */
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
    /** @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity */
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
    /**
     * @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity
     * @return VerifyClusterRankingScoreRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyClusterRankingScoreRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyClusterRankingScoreRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyClusterRankingScoreRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyClusterRankingScoreRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withClusterName(array_key_exists('clusterName', $data) && $data['clusterName'] !== null ? $data['clusterName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "rankingName" => $this->getRankingName(),
            "clusterName" => $this->getClusterName(),
            "verifyType" => $this->getVerifyType(),
            "season" => $this->getSeason(),
            "score" => $this->getScore(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
        );
    }
}