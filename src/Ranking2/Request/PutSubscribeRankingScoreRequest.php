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
 * Request for putSubscribeRankingScore: Register Subscribe Ranking Score
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#putsubscriberankingscore
 */
class PutSubscribeRankingScoreRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Subscribe Ranking Model name */
    private $rankingName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Score */
    private $score;
    /** @var string Metadata */
    private $metadata;
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
     * @return PutSubscribeRankingScoreRequest
     */
	public function withNamespaceName(?string $namespaceName): PutSubscribeRankingScoreRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
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
     * @return PutSubscribeRankingScoreRequest
     */
	public function withRankingName(?string $rankingName): PutSubscribeRankingScoreRequest {
		$this->rankingName = $rankingName;
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
     * @return PutSubscribeRankingScoreRequest
     */
	public function withAccessToken(?string $accessToken): PutSubscribeRankingScoreRequest {
		$this->accessToken = $accessToken;
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
     * @return PutSubscribeRankingScoreRequest
     */
	public function withScore(?int $score): PutSubscribeRankingScoreRequest {
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
     * @return PutSubscribeRankingScoreRequest
     */
	public function withMetadata(?string $metadata): PutSubscribeRankingScoreRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PutSubscribeRankingScoreRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PutSubscribeRankingScoreRequest {
        if ($data === null) {
            return null;
        }
        return (new PutSubscribeRankingScoreRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rankingName" => $this->getRankingName(),
            "accessToken" => $this->getAccessToken(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
        );
    }
}