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

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;
use Gs2\Identifier\Model\TwoFactorAuthenticationSetting;
use Gs2\Identifier\Model\Password;

/**
 * Result of enableMfa: Enable MFA
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#enablemfa
 */
class EnableMfaResult implements IResult {
    /** @var Password Password updated */
    private $item;
    /** @var string Challenge Token */
    private $challengeToken;

    /** @return Password|null Password updated */
	public function getItem(): ?Password {
		return $this->item;
	}

    /** @param Password|null $item Password updated */
	public function setItem(?Password $item) {
		$this->item = $item;
	}

    /**
     * @param Password|null $item Password updated
     * @return EnableMfaResult
     */
	public function withItem(?Password $item): EnableMfaResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Challenge Token */
	public function getChallengeToken(): ?string {
		return $this->challengeToken;
	}

    /** @param string|null $challengeToken Challenge Token */
	public function setChallengeToken(?string $challengeToken) {
		$this->challengeToken = $challengeToken;
	}

    /**
     * @param string|null $challengeToken Challenge Token
     * @return EnableMfaResult
     */
	public function withChallengeToken(?string $challengeToken): EnableMfaResult {
		$this->challengeToken = $challengeToken;
		return $this;
	}

    public static function fromJson(?array $data): ?EnableMfaResult {
        if ($data === null) {
            return null;
        }
        return (new EnableMfaResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Password::fromJson($data['item']) : null)
            ->withChallengeToken(array_key_exists('challengeToken', $data) && $data['challengeToken'] !== null ? $data['challengeToken'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "challengeToken" => $this->getChallengeToken(),
        );
    }
}