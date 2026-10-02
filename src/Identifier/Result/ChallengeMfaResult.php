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
 * Result of challengeMfa: Verify MFA
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#challengemfa
 */
class ChallengeMfaResult implements IResult {
    /** @var Password Password updated */
    private $item;

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
     * @return ChallengeMfaResult
     */
	public function withItem(?Password $item): ChallengeMfaResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?ChallengeMfaResult {
        if ($data === null) {
            return null;
        }
        return (new ChallengeMfaResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Password::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}