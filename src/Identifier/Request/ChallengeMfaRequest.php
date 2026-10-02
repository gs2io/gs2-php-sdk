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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for challengeMfa: Verify MFA
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#challengemfa
 */
class ChallengeMfaRequest extends Gs2BasicRequest {
    /** @var string User Name */
    private $userName;
    /** @var string One-time password code */
    private $passcode;
    /** @return string|null User Name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName User Name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName User Name
     * @return ChallengeMfaRequest
     */
	public function withUserName(?string $userName): ChallengeMfaRequest {
		$this->userName = $userName;
		return $this;
	}
    /** @return string|null One-time password code */
	public function getPasscode(): ?string {
		return $this->passcode;
	}
    /** @param string|null $passcode One-time password code */
	public function setPasscode(?string $passcode) {
		$this->passcode = $passcode;
	}
    /**
     * @param string|null $passcode One-time password code
     * @return ChallengeMfaRequest
     */
	public function withPasscode(?string $passcode): ChallengeMfaRequest {
		$this->passcode = $passcode;
		return $this;
	}

    public static function fromJson(?array $data): ?ChallengeMfaRequest {
        if ($data === null) {
            return null;
        }
        return (new ChallengeMfaRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withPasscode(array_key_exists('passcode', $data) && $data['passcode'] !== null ? $data['passcode'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "passcode" => $this->getPasscode(),
        );
    }
}