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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class ChallengeMfaRequest extends Gs2BasicRequest {
    /** @var string */
    private $accountToken;
    /** @var string */
    private $passcode;
	public function getAccountToken(): ?string {
		return $this->accountToken;
	}
	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}
	public function withAccountToken(?string $accountToken): ChallengeMfaRequest {
		$this->accountToken = $accountToken;
		return $this;
	}
	public function getPasscode(): ?string {
		return $this->passcode;
	}
	public function setPasscode(?string $passcode) {
		$this->passcode = $passcode;
	}
	public function withPasscode(?string $passcode): ChallengeMfaRequest {
		$this->passcode = $passcode;
		return $this;
	}

    public static function fromJson(?array $data): ?ChallengeMfaRequest {
        if ($data === null) {
            return null;
        }
        return (new ChallengeMfaRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withPasscode(array_key_exists('passcode', $data) && $data['passcode'] !== null ? $data['passcode'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "passcode" => $this->getPasscode(),
        );
    }
}