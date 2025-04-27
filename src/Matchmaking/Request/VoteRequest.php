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
use Gs2\Matchmaking\Model\GameResult;

class VoteRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $ballotBody;
    /** @var string */
    private $ballotSignature;
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
	public function withNamespaceName(?string $namespaceName): VoteRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBallotBody(): ?string {
		return $this->ballotBody;
	}
	public function setBallotBody(?string $ballotBody) {
		$this->ballotBody = $ballotBody;
	}
	public function withBallotBody(?string $ballotBody): VoteRequest {
		$this->ballotBody = $ballotBody;
		return $this;
	}
	public function getBallotSignature(): ?string {
		return $this->ballotSignature;
	}
	public function setBallotSignature(?string $ballotSignature) {
		$this->ballotSignature = $ballotSignature;
	}
	public function withBallotSignature(?string $ballotSignature): VoteRequest {
		$this->ballotSignature = $ballotSignature;
		return $this;
	}
	public function getGameResults(): ?array {
		return $this->gameResults;
	}
	public function setGameResults(?array $gameResults) {
		$this->gameResults = $gameResults;
	}
	public function withGameResults(?array $gameResults): VoteRequest {
		$this->gameResults = $gameResults;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): VoteRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?VoteRequest {
        if ($data === null) {
            return null;
        }
        return (new VoteRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBallotBody(array_key_exists('ballotBody', $data) && $data['ballotBody'] !== null ? $data['ballotBody'] : null)
            ->withBallotSignature(array_key_exists('ballotSignature', $data) && $data['ballotSignature'] !== null ? $data['ballotSignature'] : null)
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
            "ballotBody" => $this->getBallotBody(),
            "ballotSignature" => $this->getBallotSignature(),
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