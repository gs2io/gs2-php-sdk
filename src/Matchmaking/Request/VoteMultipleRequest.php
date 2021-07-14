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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\SignedBallot;
use Gs2\Matchmaking\Model\GameResult;

class VoteMultipleRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var array */
    private $signedBallots;
    /** @var array */
    private $gameResults;
    /** @var string */
    private $keyId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): VoteMultipleRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getSignedBallots(): ?array {
		return $this->signedBallots;
	}

	public function setSignedBallots(?array $signedBallots) {
		$this->signedBallots = $signedBallots;
	}

	public function withSignedBallots(?array $signedBallots): VoteMultipleRequest {
		$this->signedBallots = $signedBallots;
		return $this;
	}

	public function getGameResults(): ?array {
		return $this->gameResults;
	}

	public function setGameResults(?array $gameResults) {
		$this->gameResults = $gameResults;
	}

	public function withGameResults(?array $gameResults): VoteMultipleRequest {
		$this->gameResults = $gameResults;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): VoteMultipleRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?VoteMultipleRequest {
        if ($data === null) {
            return null;
        }
        return (new VoteMultipleRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withSignedBallots(array_map(
                function ($item) {
                    return SignedBallot::fromJson($item);
                },
                array_key_exists('signedBallots', $data) && $data['signedBallots'] !== null ? $data['signedBallots'] : []
            ))
            ->withGameResults(array_map(
                function ($item) {
                    return GameResult::fromJson($item);
                },
                array_key_exists('gameResults', $data) && $data['gameResults'] !== null ? $data['gameResults'] : []
            ))
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "signedBallots" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSignedBallots() !== null && $this->getSignedBallots() !== null ? $this->getSignedBallots() : []
            ),
            "gameResults" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGameResults() !== null && $this->getGameResults() !== null ? $this->getGameResults() : []
            ),
            "keyId" => $this->getKeyId(),
        );
    }
}