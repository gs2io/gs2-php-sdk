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

/**
 * Request for vote: Vote on match results
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#vote-1
 */
class VoteRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Data for ballot signature targets */
    private $ballotBody;
    /** @var string Signature */
    private $ballotSignature;
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
     * @return VoteRequest
     */
	public function withNamespaceName(?string $namespaceName): VoteRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Data for ballot signature targets */
	public function getBallotBody(): ?string {
		return $this->ballotBody;
	}
    /** @param string|null $ballotBody Data for ballot signature targets */
	public function setBallotBody(?string $ballotBody) {
		$this->ballotBody = $ballotBody;
	}
    /**
     * @param string|null $ballotBody Data for ballot signature targets
     * @return VoteRequest
     */
	public function withBallotBody(?string $ballotBody): VoteRequest {
		$this->ballotBody = $ballotBody;
		return $this;
	}
    /** @return string|null Signature */
	public function getBallotSignature(): ?string {
		return $this->ballotSignature;
	}
    /** @param string|null $ballotSignature Signature */
	public function setBallotSignature(?string $ballotSignature) {
		$this->ballotSignature = $ballotSignature;
	}
    /**
     * @param string|null $ballotSignature Signature
     * @return VoteRequest
     */
	public function withBallotSignature(?string $ballotSignature): VoteRequest {
		$this->ballotSignature = $ballotSignature;
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
     * @return VoteRequest
     */
	public function withGameResults(?array $gameResults): VoteRequest {
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
     * @return VoteRequest
     */
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