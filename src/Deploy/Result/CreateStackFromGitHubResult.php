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

namespace Gs2\Deploy\Result;

use Gs2\Core\Model\IResult;
use Gs2\Deploy\Model\Stack;

/**
 * Result of createStackFromGitHub: Create Stack from GitHub
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#createstackfromgithub
 */
class CreateStackFromGitHubResult implements IResult {
    /** @var Stack Stack created */
    private $item;

    /** @return Stack|null Stack created */
	public function getItem(): ?Stack {
		return $this->item;
	}

    /** @param Stack|null $item Stack created */
	public function setItem(?Stack $item) {
		$this->item = $item;
	}

    /**
     * @param Stack|null $item Stack created
     * @return CreateStackFromGitHubResult
     */
	public function withItem(?Stack $item): CreateStackFromGitHubResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateStackFromGitHubResult {
        if ($data === null) {
            return null;
        }
        return (new CreateStackFromGitHubResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Stack::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}