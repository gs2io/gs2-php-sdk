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

namespace Gs2\SeasonRating\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\SeasonRating\Model\SignedBallot;
use Gs2\SeasonRating\Model\GameResult;

/**
 * Request for voteMultiple: Compile match results and vote
 *
 * @see https://docs.gs2.io/api_reference/season_rating/sdk/#votemultiple
 */
class VoteMultipleRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var array List of Ballot with signatures */
    private $signedBallots;
    /** @var array List of Results */
    private $gameResults;
    /** @var string Encryption Key GRN */
    private $keyId;
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
     * @return VoteMultipleRequest
     */
	public function withNamespaceName(?string $namespaceName): VoteMultipleRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return array|null List of Ballot with signatures */
	public function getSignedBallots(): ?array {
		return $this->signedBallots;
	}
    /** @param array|null $signedBallots List of Ballot with signatures */
	public function setSignedBallots(?array $signedBallots) {
		$this->signedBallots = $signedBallots;
	}
    /**
     * @param array|null $signedBallots List of Ballot with signatures
     * @return VoteMultipleRequest
     */
	public function withSignedBallots(?array $signedBallots): VoteMultipleRequest {
		$this->signedBallots = $signedBallots;
		return $this;
	}
    /** @return array|null List of Results */
	public function getGameResults(): ?array {
		return $this->gameResults;
	}
    /** @param array|null $gameResults List of Results */
	public function setGameResults(?array $gameResults) {
		$this->gameResults = $gameResults;
	}
    /**
     * @param array|null $gameResults List of Results
     * @return VoteMultipleRequest
     */
	public function withGameResults(?array $gameResults): VoteMultipleRequest {
		$this->gameResults = $gameResults;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return VoteMultipleRequest
     */
	public function withKeyId(?string $keyId): VoteMultipleRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?VoteMultipleRequest {
        if ($data === null) {
            return null;
        }
        return (new VoteMultipleRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSignedBallots(!array_key_exists('signedBallots', $data) || $data['signedBallots'] === null ? null : array_map(
                function ($item) {
                    return SignedBallot::fromJson($item);
                },
                $data['signedBallots']
            ))
            ->withGameResults(!array_key_exists('gameResults', $data) || $data['gameResults'] === null ? null : array_map(
                function ($item) {
                    return GameResult::fromJson($item);
                },
                $data['gameResults']
            ))
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "signedBallots" => $this->getSignedBallots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSignedBallots()
            ),
            "gameResults" => $this->getGameResults() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGameResults()
            ),
            "keyId" => $this->getKeyId(),
        );
    }
}