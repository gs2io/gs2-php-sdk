<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\InGamePushNotification\Model;

/**
 * クライアント証明書
 *
 * @author Game Server Services, Inc.
 *
 */
class Certificate {

	/** @var string 証明書ID */
	private $certificateId;

	/** @var string クライアント証明書 */
	private $certificate;

	/** @var string 秘密鍵 */
	private $privateKey;

	/** @var string PFXフォーマットの秘密鍵 */
	private $pfx;

	/**
	 * 証明書IDを取得
	 *
	 * @return string 証明書ID
	 */
	public function getCertificateId() {
		return $this->certificateId;
	}

	/**
	 * 証明書IDを設定
	 *
	 * @param string $certificateId 証明書ID
	 */
	public function setCertificateId($certificateId) {
		$this->certificateId = $certificateId;
	}

	/**
	 * 証明書IDを設定
	 *
	 * @param string $certificateId 証明書ID
	 * @return self
	 */
	public function withCertificateId($certificateId): self {
		$this->setCertificateId($certificateId);
		return $this;
	}

	/**
	 * クライアント証明書を取得
	 *
	 * @return string クライアント証明書
	 */
	public function getCertificate() {
		return $this->certificate;
	}

	/**
	 * クライアント証明書を設定
	 *
	 * @param string $certificate クライアント証明書
	 */
	public function setCertificate($certificate) {
		$this->certificate = $certificate;
	}

	/**
	 * クライアント証明書を設定
	 *
	 * @param string $certificate クライアント証明書
	 * @return self
	 */
	public function withCertificate($certificate): self {
		$this->setCertificate($certificate);
		return $this;
	}

	/**
	 * 秘密鍵を取得
	 *
	 * @return string 秘密鍵
	 */
	public function getPrivateKey() {
		return $this->privateKey;
	}

	/**
	 * 秘密鍵を設定
	 *
	 * @param string $privateKey 秘密鍵
	 */
	public function setPrivateKey($privateKey) {
		$this->privateKey = $privateKey;
	}

	/**
	 * 秘密鍵を設定
	 *
	 * @param string $privateKey 秘密鍵
	 * @return self
	 */
	public function withPrivateKey($privateKey): self {
		$this->setPrivateKey($privateKey);
		return $this;
	}

	/**
	 * PFXフォーマットの秘密鍵を取得
	 *
	 * @return string PFXフォーマットの秘密鍵
	 */
	public function getPfx() {
		return $this->pfx;
	}

	/**
	 * PFXフォーマットの秘密鍵を設定
	 *
	 * @param string $pfx PFXフォーマットの秘密鍵
	 */
	public function setPfx($pfx) {
		$this->pfx = $pfx;
	}

	/**
	 * PFXフォーマットの秘密鍵を設定
	 *
	 * @param string $pfx PFXフォーマットの秘密鍵
	 * @return self
	 */
	public function withPfx($pfx): self {
		$this->setPfx($pfx);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Certificate
	 */
    static function build(array $array)
    {
        $item = new Certificate();
        $item->setCertificateId(isset($array['certificateId']) ? $array['certificateId'] : null);
        $item->setCertificate(isset($array['certificate']) ? $array['certificate'] : null);
        $item->setPrivateKey(isset($array['privateKey']) ? $array['privateKey'] : null);
        $item->setPfx(isset($array['pfx']) ? $array['pfx'] : null);
        return $item;
    }

}