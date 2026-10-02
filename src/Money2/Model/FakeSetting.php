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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Fake Setting for Debug
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#fakesetting
 */
class FakeSetting implements IModel {
	/**
     * @var string Whether to allow payments using fake receipts output by Unity Editor
	 */
	private $acceptFakeReceipt;
    /** @return string|null Whether to allow payments using fake receipts output by Unity Editor */
	public function getAcceptFakeReceipt(): ?string {
		return $this->acceptFakeReceipt;
	}
    /** @param string|null $acceptFakeReceipt Whether to allow payments using fake receipts output by Unity Editor */
	public function setAcceptFakeReceipt(?string $acceptFakeReceipt) {
		$this->acceptFakeReceipt = $acceptFakeReceipt;
	}
    /**
     * @param string|null $acceptFakeReceipt Whether to allow payments using fake receipts output by Unity Editor
     * @return FakeSetting
     */
	public function withAcceptFakeReceipt(?string $acceptFakeReceipt): FakeSetting {
		$this->acceptFakeReceipt = $acceptFakeReceipt;
		return $this;
	}

    public static function fromJson(?array $data): ?FakeSetting {
        if ($data === null) {
            return null;
        }
        return (new FakeSetting())
            ->withAcceptFakeReceipt(array_key_exists('acceptFakeReceipt', $data) && $data['acceptFakeReceipt'] !== null ? $data['acceptFakeReceipt'] : null);
    }

    public function toJson(): array {
        return array(
            "acceptFakeReceipt" => $this->getAcceptFakeReceipt(),
        );
    }
}